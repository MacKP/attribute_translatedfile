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
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2012-2019 The MetaModels team.
 * @license    https://github.com/MetaModels/attribute_translatedfile/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 * @filesource
 */

/**
 * Table tl_metamodel_translatedlongblob
 */
$GLOBALS['TL_DCA']['tl_metamodel_translatedlongblob'] = [
    // Config
    'config' => [
        'sql' => [
            'keys' => [
                'id'                      => 'primary',
                'att_id,item_id,langcode' => 'index'
            ]
        ]
    ],
    // Fields
    'fields' => [
        'id' => [
            'sql'                     => 'int(10) unsigned NOT NULL auto_increment'
        ],
        'tstamp' => [
            'sql'                     => 'int(10) unsigned NOT NULL default \'0\''
        ],
        'att_id' => [
            'sql'                     => 'int(10) unsigned NOT NULL default \'0\''
        ],
        'item_id' => [
            'sql'                     => 'int(10) unsigned NOT NULL default \'0\''
        ],
        'langcode' => [
            'sql'                     => 'varchar(5) NOT NULL default \'\''
        ],
        'value' => [
            'sql'                     => 'longblob NULL'
        ],
        'value_sorting' => [
            'sql'                     => 'longblob NULL'
        ]
    ]
];
