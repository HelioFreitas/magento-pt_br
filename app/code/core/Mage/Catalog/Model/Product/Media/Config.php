<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Catalog product media config
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Catalog_Model_Product_Media_Config implements Mage_Media_Model_Image_Config_Interface
{

        public function getBaseMediaPath()
        {
            return Mage::getBaseDir('media') . DS . 'catalog' . DS . 'product';
        }

        public function getBaseMediaUrl()
        {
            return Mage::getBaseUrl('media') . 'catalog/product';
        }

        public function getBaseTmpMediaPath()
        {
            return Mage::getBaseDir('media') . DS . 'tmp' . DS . 'catalog' . DS . 'product';
        }

        public function getBaseTmpMediaUrl()
        {
            return Mage::getBaseUrl('media') . 'tmp/catalog/product';
        }

        public function getMediaUrl($file)
        {
            $file = $this->_prepareFileForUrl($file);

            if(substr($file, 0, 1) == '/') {
                return $this->getBaseMediaUrl() . $file;
            }

            return $this->getBaseMediaUrl() . '/' . $file;
        }

        public function getMediaPath($file)
        {
            $file = $this->_prepareFileForPath($file);

            if(substr($file, 0, 1) == DS) {
                return $this->getBaseMediaPath() . DS . substr($file, 1);
            }

            return $this->getBaseMediaPath() . DS . $file;
        }

        public function getTmpMediaUrl($file)
        {
            $file = $this->_prepareFileForUrl($file);

            if(substr($file, 0, 1) == '/') {
                return $this->getBaseTmpMediaUrl() . $file;
            }

            return $this->getBaseTmpMediaUrl() . '/' . $file;
        }

        public function getTmpMediaPath($file)
        {
            $file = $this->_prepareFileForPath($file);

            if(substr($file, 0, 1) == DS) {
                return $this->getBaseTmpMediaPath() . DS . substr($file, 1);
            }

            return $this->getBaseTmpMediaPath() . DS . $file;
        }

        protected function _prepareFileForUrl($file)
        {
            return str_replace(DS, '/', $file);
        }

        protected function _prepareFileForPath($file)
        {
            return str_replace('/', DS, $file);
        }
}