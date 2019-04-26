<?php

namespace QueryBuilder\Mysql;

use PHPUnit\Framework\TestCase;

class SelectAndFiltersIntegrationTest extends TestCase {

  public function testSelectWithFiltersWhereAndOrder () {

    $select = new Select;
    $select->table('users');

    $fielters = new Filters;
    $fielters->where('id', '=', 1);
    $fielters->orderBy('created', 'desc');

    $select->filter($fielters);

    $actual = $select->getSql();
    $expected = 'SELECT * FROM users WHERE id=1 ORDER BY created desc';

    $this->assertEquals($expected, $actual);

  }

}