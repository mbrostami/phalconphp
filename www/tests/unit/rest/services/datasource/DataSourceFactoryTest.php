<?php
namespace Test\Rest\Services\Datasource;

use App\Services\Datasource\DataSourceFactory;
use App\Services\Datasource\DataTypeInterface;

class DataSourceFactoryTest extends \UnitTestCase
{
    public function setUp()
    {
        parent::setUp();
        file_put_contents('tests/_data/validdatasource.json', '[{"field": "value"}]');
    }

    public function testCreateAdapter()
    {
        $adapter = DataSourceFactory::TYPE_JSON;
        $configs = [
            'path' => 'tests/_data/validdatasource.json'
        ];
        $dataSourceFactory = new DataSourceFactory();
        $dataSourceAdapter = $dataSourceFactory->createDataSourceAdapter($adapter, $configs);
        $this->assertInstanceOf(DataTypeInterface::class, $dataSourceAdapter);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage For Json adapter, path parameter is required
     */
    public function testCreateAdapterWithWrongConfig()
    {
        $adapter = DataSourceFactory::TYPE_JSON;
        $configs = [
            'wrongkey' => 'tests/_data/validdatasource.json'
        ];
        $dataSourceFactory = new DataSourceFactory();
        $dataSourceAdapter = $dataSourceFactory->createDataSourceAdapter($adapter, $configs);
        $this->expectException(\Exception::class);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Json file is not exists
     */
    public function testCreateAdapterWithWrongPath()
    {
        $adapter = DataSourceFactory::TYPE_JSON;
        $configs = [
            'path' => 'tests/_data/not/found/validdatasource.json'
        ];
        $dataSourceFactory = new DataSourceFactory();
        $dataSourceAdapter = $dataSourceFactory->createDataSourceAdapter($adapter, $configs);
        $this->expectException(\Exception::class);
    }

    public function tearDown()
    {
        unlink('tests/_data/validdatasource.json');
    }
}
