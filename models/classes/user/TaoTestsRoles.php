<?php

/**
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
 * Copyright (c) 2023 (original work) Open Assessment Technologies SA;
 */

declare(strict_types=1);

namespace oat\taoTests\models\user;

interface TaoTestsRoles
{
    public const TEST_IMPORTER = 'http://www.tao.lu/Ontologies/TAOTest.rdf#TestImporterRole';
    public const TEST_EXPORTER = 'http://www.tao.lu/Ontologies/TAOTest.rdf#TestExporterRole';
    public const TEST_MANAGER = 'http://www.tao.lu/Ontologies/TAOTest.rdf#TestsManagerRole';
    public const RESTRICTED_TEST_AUTHOR = 'http://www.tao.lu/Ontologies/TAO.rdf#RestrictedTestAuthor';
    public const TEST_TRANSLATOR = 'http://www.tao.lu/Ontologies/TAOTest.rdf#TestTranslator';
    public const TEST_AUTHOR = 'http://www.tao.lu/Ontologies/TAOItem.rdf#TestAuthor';
}
