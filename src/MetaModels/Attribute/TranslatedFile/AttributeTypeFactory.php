<?php

/**
 * This file is part of MetaModels/attribute_translatedfile.
 *
 * (c) 2012-2019 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels/attribute_translatedfile
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @copyright  2012-2019 The MetaModels team.
 * @license    https://github.com/MetaModels/attribute_translatedfile/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace MetaModels\Attribute\TranslatedFile;

use MetaModels\Attribute\AbstractAttributeTypeFactory;

/**
 * Attribute type factory for translated combined values attributes.
 */
class AttributeTypeFactory extends AbstractAttributeTypeFactory
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct();
        $this->typeName  = 'translatedfile';
        $this->typeIcon  = 'system/modules/metamodelsattribute_translatedfile/html/file.png';
        $this->typeClass = 'MetaModels\Attribute\TranslatedFile\TranslatedFile';
    }

    /**
     * {@inheritDoc}
     */
    public function createInstance($information, $metaModel)
    {
        $sortAttribute = $information['colname'] . '__sort';

        $file = parent::createInstance($information, $metaModel);

        if (!$information['file_multiple']
            || $metaModel->hasAttribute($sortAttribute)
        ) {
            return $file;
        }

        $information['id']      = $information['id'] . '__sort';
        $information['colname'] = $sortAttribute;
        $order                  = new TranslatedFileOrder($metaModel, $information);
        $metaModel->addAttribute($order);

        return $file;
    }
}