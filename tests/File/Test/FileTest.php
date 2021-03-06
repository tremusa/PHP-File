<?php
/**
 * PHP library for file management.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-File
 * @since      1.1.4
 */

namespace Josantonius\File\Test;

use Josantonius\File\File,
    PHPUnit\Framework\TestCase;

/**
 * Tests class for File library.
 *
 * @since 1.1.4
 */
class FileTest extends TestCase { 

   /**
     * Test if a local file exists.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testIfLocalFileExists() {
        
        $this->assertTrue(

            File::exists(__FILE__)
        );
    }

   /**
     * Test if a local file doesn't exists.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testIfLocalFileDoesNotExists() {
        
        $this->assertFalse(

            File::exists(__DIR__ . '/test.txt')
        );
    }

   /**
     * Test if a external file exists.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testIfExternalFileExists() {
        
        $this->assertTrue(

            File::exists('https://raw.githubusercontent.com/Josantonius/PHP-File/master/composer.json')
        );
    }

   /**
     * Test if a external file doesn't exists.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testIfExternalFileDoesNotExists() {
        
        $this->assertFalse(

            File::exists('https://raw.githubusercontent.com/unknown.json')
        );
    }

   /**
     * Test delete a local file.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testDeleteLocalFile() {

        touch(__DIR__ . '/test.txt');

        $this->assertTrue(

            File::delete(__DIR__ . '/test.txt')
        );
    }

   /**
     * Test delete missing local file.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testDeleteMissingLocalFile() {

        $this->assertFalse(

            File::delete(__DIR__ . '/test.txt')
        );
    }

   /**
     * Test create directory.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testCreateDir() {

        $this->assertTrue(

            File::createDir(__DIR__ . '/test/')
        );
    }

   /**
     * Test error to create directory.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testCreateDirError() {

        $this->assertFalse(

            File::createDir('')
        );
    }

   /**
     * Test delete empty directory.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testDeleteEmptyDir() {

        $this->assertTrue(

            File::deleteEmptyDir(__DIR__ . '/test/')
        );
    }

   /**
     * Test error to delete empty directory.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testDeleteEmptyDirError() {

        $this->assertFalse(

            File::deleteEmptyDir(__DIR__ . '/test/')
        );
    }

   /**
     * Test delete directory recursively.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testDeleteDirRecursively() {

        File::createDir(__DIR__ . '/test/test/test/');

        touch(__DIR__ . '/test/test/test/test.txt');

        $this->assertTrue(

            File::deleteDirRecursively(__DIR__ . '/test/')
        );
    }

   /**
     * Test delete missing directory recursively.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testDeleteMissingDirRecursively() {

        $this->assertFalse(

            File::deleteDirRecursively(__DIR__ . '/test/')
        );
    }

   /**
     * Test get files from directory.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testGetFilesFromDir() {

        $this->assertContains(

            'DirectoryIterator',
            get_class(File::getFilesFromDir(__DIR__))
        );
    }

   /**
     * Test get files from missing directory.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testGetFilesFromMissingDir() {

        $this->assertFalse(

            File::getFilesFromDir('')
        );
    }
}
