<?php
/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 * @package     MetaModels
 * @subpackage  AttributeTranslatedFile
 * @author      Stefan Heimes <cms@men-at-work.de>
 * @copyright   The MetaModels team.
 * @license     LGPL.
 * @filesource
 */

namespace MetaModels\Dca;

use ContaoCommunityAlliance\DcGeneral\DataContainerInterface;
use MetaModels\Helper\ContaoController;

/**
 * Supplementary class for handling DCA information for translated file attributes.
 *
 * @package    MetaModels
 * @subpackage AttributeTranslatedFile
 * @author     Stefan Heimes <cms@men-at-work.de>
 */
class AttributeTranslatedFile
{
    /**
     * Return the file picker wizard.
     *
     * @param DataContainerInterface $dc The data container.
     *
     * @return string
     */
    public function filePicker(DataContainerInterface $dc)
    {
        if (version_compare(VERSION, '3.1', '>=')) {
            $currentField = $dc->getEnvironment()->getCurrentModel()->getItem()->get($dc->field);
            // Use 'b' as an id when creating a new item.
            $strId = ($dc->id) ? $dc->id : 'b';

            return ' <a href="'.\Environment::getInstance()->base.
                'contao/file.php?do='.\Input::get('do').'&amp;table='.$dc->table.'&amp;field='.$dc->field.
                '_'.$strId.'&amp;value='.$currentField['path'][0].'&mmfilepicker=1" title="'.
                specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MSC']['filepicker'])).
                '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\''.
                specialchars($GLOBALS['TL_LANG']['MOD']['files'][0]).'\',\'url\':this.href,\'id\':\''.$dc->field.
                '\',\'tag\':\'ctrl_'.$dc->field.'_'.$strId.
                ((\Input::get('act') == 'editAll') ? '_'.$strId : '').'\',\'self\':this});return false">'.
                \Image::getHtml(
                    'pickfile.gif',
                    $GLOBALS['TL_LANG']['MSC']['filepicker'],
                    'style="vertical-align:top;cursor:pointer"'
                ).'</a>';
        }
        $strField = 'ctrl_'.$dc->inputName.((\Input::getInstance()->get('act') == 'editAll') ? '_'.$dc->id : '');

        return ' '.ContaoController::getInstance()->generateImage(
            'pickfile.gif',
            $GLOBALS['TL_LANG']['MSC']['filepicker'],
            'style="vertical-align:top;cursor:pointer" onclick="Backend.pickFile(\''.$strField.'\')"'
        );
    }
}
