<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  2011-2016 ESS-UA [M2E Pro]
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Block\Adminhtml\Order\Log\Grid;

class LastActions extends \Ess\M2ePro\Block\Adminhtml\Log\Grid\LastActions
{
    //########################################

    protected function _construct()
    {
        parent::_construct();

        // Initialization block
        // ---------------------------------------
        $this->setId('lastOrderActions');
        // ---------------------------------------
    }

    //########################################

    protected function getActions(array $logs)
    {
        $actions = $this->getGroupedActions($logs);

        $this->sortActions($actions);

        return $actions;
    }

    protected function getGroupedActions(array $logs)
    {
        $actions = [];

        foreach ($logs as $log) {
            $actions[] = [
                'type' => $log->getData('type'),
                'text' => $this->getHelper('View')->getModifiedLogMessage($log->getData('description')),
                'initiator' => $this->getInitiator([$log]),
                'date' => $this->_localeDate->formatDate($log->getData('create_date'), \IntlDateFormatter::MEDIUM, true)
            ];
        }

        return $actions;
    }

    //########################################
}