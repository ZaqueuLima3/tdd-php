<?php

namespace QueryBuilder\Mysql;

use PHPUnit\Framework\TestCase;

class FiltersTest extends TestCase {

  public function testWhere () {

    $fielters = new Filters;
    $fielters->where('id', '=', 1);

    $actual = $fielters->getSql();
    $expected = 'WHERE id=1';

    $this->assertEquals($expected, $actual);

  }

  public function testOrderBy () {

    $fielters = new Filters;
    $fielters->orderBy('created', 'desc');

    $actual = $fielters->getSql();
    $expected = 'ORDER BY created desc';

    $this->assertEquals($expected, $actual);

  }

  public function testOrderByEndSelect () {

    $fielters = new Filters;
    $fielters->where('id', '=', 1);
    $fielters->orderBy('created', 'desc');

    $actual = $fielters->getSql();
    $expected = 'WHERE id=1 ORDER BY created desc';

    $this->assertEquals($expected, $actual);

  }

}