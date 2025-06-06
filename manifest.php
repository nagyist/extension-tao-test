<?php

/*
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Copyright (c) 2002-2008 (original work) Public Research Centre Henri Tudor & University of Luxembourg
 *                         (under the project TAO & TAO2);
 *               2008-2010 (update and modification) Deutsche Institut für Internationale Pädagogische Forschung
 *                         (under the project TAO-TRANSFER);
 *               2009-2012 (update and modification) Public Research Centre Henri Tudor
 *                         (under the project TAO-SUSTAIN & TAO-DEV);
 *               2013-2023 (update and modification) Open Assessment Technologies SA.
 */

/*
 * @author CRP Henri Tudor - TAO Team - {@link http://www.tao.lu}
 * @license GPLv2  http://www.opensource.org/licenses/gpl-2.0.php
 */

use oat\tao\model\accessControl\func\AccessRule;
use oat\tao\model\user\TaoRoles;
use oat\taoTests\models\Copier\CopierServiceProvider;
use oat\taoTests\models\Form\ServiceProvider\FormServiceProvider;
use oat\taoTests\models\Translation\ServiceProvider\TranslationServiceProvider;
use oat\taoTests\models\user\TaoTestsRoles;
use oat\taoTests\scripts\install\RegisterFrontendPaths;
use oat\taoTests\scripts\install\RegisterTestPluginService;
use oat\taoTests\scripts\install\RegisterTestPreviewerRegistryService;
use oat\taoTests\scripts\install\RegisterTestProviderService;
use oat\taoTests\scripts\install\SetupEventListeners;
use oat\taoTests\scripts\install\SetupProvider;
use oat\taoTests\scripts\install\SetupSectionVisibilityFilters;
use oat\taoTests\scripts\update\Updater;

$extpath = __DIR__ . DIRECTORY_SEPARATOR;

return [
    'name' => 'taoTests',
    'label' => 'Test core extension',
    'description' => 'TAO Tests extension contains the abstraction of the test-runners, but requires an implementation '
        . 'in order to be able to run tests',
    'license' => 'GPL-2.0',
    'author' => 'Open Assessment Technologies, CRP Henri Tudor',
    'models' => [
        'http://www.tao.lu/Ontologies/TAOTest.rdf',
    ],
    'install' => [
        'rdf' => [
            __DIR__ . '/models/ontology/taotest.rdf',
        ],
        'php' => [
            RegisterTestPluginService::class,
            RegisterTestProviderService::class,
            RegisterFrontendPaths::class,
            RegisterTestPreviewerRegistryService::class,
            SetupProvider::class,
            SetupEventListeners::class,
            SetupSectionVisibilityFilters::class
        ],
    ],
    'update' => Updater::class,
    'managementRole' => TaoTestsRoles::TEST_MANAGER,
    'acl' => [
        [
            AccessRule::GRANT,
            TaoTestsRoles::TEST_MANAGER,
            ['ext' => 'taoTests']
        ],
        [
            AccessRule::GRANT,
            TaoRoles::REST_PUBLISHER,
            ['ext' => 'taoTests', 'mod' => 'RestTests']
        ],
        [
            AccessRule::GRANT,
            TaoTestsRoles::TEST_AUTHOR,
            ['ext' => 'taoTests', 'mod' => 'Tests', 'act' => 'preview'],
        ],
        [
            AccessRule::GRANT,
            TaoTestsRoles::TEST_EXPORTER,
            ['ext' => 'taoTests', 'mod' => 'TestExport']
        ],
        [
            AccessRule::GRANT,
            TaoTestsRoles::TEST_IMPORTER,
            ['ext' => 'taoTests', 'mod' => 'TestImport']
        ],
        [
            AccessRule::GRANT,
            TaoRoles::REST_PUBLISHER,
            ['ext' => 'taoTests', 'mod' => 'RestTests']
        ],
        [
            AccessRule::GRANT,
            TaoTestsRoles::RESTRICTED_TEST_AUTHOR,
            ['ext' => 'taoTests', 'mod' => 'Tests']
        ],
        [
            AccessRule::GRANT,
            TaoTestsRoles::TEST_TRANSLATOR,
            [
                'ext' => 'tao',
                'mod' => 'Translation'
            ]
        ]
    ],
    'optimizableClasses' => [
        'http://www.tao.lu/Ontologies/TAOTest.rdf#Test',
    ],
    'constants' => [
        # actions directory
        "DIR_ACTIONS" => $extpath . "actions" . DIRECTORY_SEPARATOR,

        # views directory
        "DIR_VIEWS" => $extpath . "views" . DIRECTORY_SEPARATOR,

        # default module name
        'DEFAULT_MODULE_NAME' => 'Tests',

        #default action name
        'DEFAULT_ACTION_NAME' => 'index',

        #BASE PATH: the root path in the file system (usually the document root)
        'BASE_PATH' => $extpath,

        #BASE URL (usually the domain root)
        'BASE_URL' => ROOT_URL . 'taoTests/',
    ],
    'containerServiceProviders' => [
        CopierServiceProvider::class,
        TranslationServiceProvider::class,
        FormServiceProvider::class,
    ],
];
