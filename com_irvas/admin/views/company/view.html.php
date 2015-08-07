<?php
defined('_JEXEC') or die;

class IrvasViewCompany extends JViewLegacy
{
    protected $items;
    public function display($tpl = null){
            $this->items = $this->get('Items');
            if (count($errors = $this->get('Errors'))){
                JError::raiseError(500, implode("\n", $errors));
                return false;
            }
        $this->addToolbar();
        parent::display($tpl);
    }
    protected function addToolbar(){
        $canDo = IrvasHelper::getActions();
        $bar = JToolBar::getInstance('toolbar');
        JToolbarHelper::title(JText::_('COM_IRVAS_MANAGER_COMPANY'), '');
        JToolbarHelper::addNew('irvas.add');
        if ($canDo->get('core.edit')){
            JToolbarHelper::editList('irvas.edit');
        }
        if ($canDo->get('core.admin')){
            JToolbarHelper::preferences('com_irvas');
        }
}