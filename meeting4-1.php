<?php

//ISP - Interface Segregation Principle

namespace Problem1 {

interface DataSource {

    /** @return Result */
    public function getResult();

    public function sortBy(SortingSpecification $sortingSpecification);

    public function filterBy(FilteringSpecification $filteringSpecification);

    public function paginateWith(PaginationSpecification $paginationSpecification);
}

class AwesomeDataSource implements DataSource {

    public function getResult()
    {
        return new Result([
            ['foo' => 'bar']
        ]);
    }

    public function sortBy(SortingSpecification $sortingSpecification)
    {
        // TODO: Implement sortBy() method.
    }

    public function filterBy(FilteringSpecification $filteringSpecification)
    {
        // TODO: Implement filterBy() method.
    }

    public function paginateWith(PaginationSpecification $paginationSpecification)
    {
        // TODO: Implement paginateWith() method.
    }
}

}

namespace Solution1
{

interface DataSource {
    /**
     * @return Result
     */
    public function getResult();
}

interface Filterable {

    /**
     * @param FilteringSpecification $filteringSpecification
     * @return void
     */
    public function filterBy(FilteringSpecification $filteringSpecification);
}

class MockDataSource implements DataSource {
    public function getResult()
    {
        return new Result([
            ['foo' => 'bar']
        ]);
    }
}

class AwesomeDoctrine1BasedDataSource implements DataSource, Filterable
{
    /** @var FilteringSpecification */
    private $filter;

    public function getResult()
    {
        $data = [];
        if (!is_null($this->filter)) {
            $data = $this->filter($data);
        }

        return new Result($data);
    }

    public function filterBy(FilteringSpecification $filteringSpecification)
    {
        $this->filter = $filteringSpecification;
    }

    private function filter(array $data)
    {
        return array_filter($data, function() {
            return //
        });
    }
}

class CachingDataSourceClient
{
    /** @var DataSource */
    private $dataSource;

    private $cache;

    /**
     * GenericClient constructor.
     * @param DataSource $dataSource
     */
    public function __construct(DataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function getCachedResult()
    {
        $cacheId = 'result';
        if ($this->cache->has($cacheId)) {
            return $this->cache->get($cacheId);
        } else {
            $result = $this->dataSource->getResult();
            $this->cache->save($cacheId, $result);
            return $result;
        }
    }
}

class DataSourceConfigurator
{
    /** @var DataSource */
    private $dataSource;

    /**
     * DataSourceConfigurator constructor.
     * @param DataSource $dataSource
     */
    public function __construct(DataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function configureByRequest(Request $request)
    {
        if ($this->dataSource instanceof Filterable) {
            $this->configureFiltering($this->dataSource, $request);
        }

        if ($this->dataSource instanceof Sortable) {
            $this->configureSorting($this->dataSource, $request);
        }

        return $this->dataSource;
    }

    private function configureFiltering(Filterable $filterable, Request $request)
    {

    }
}

}

namespace Problem2
{

interface DGDataSource {

    public function loadData();
}

class DGDataSourceDoctrineJqGridSomething implements DGDataSource
{
    public function launchRocketIntoSpace()
    {
        $this->rocketLaunched = true;
    }

    public function loadData()
    {
        if (!$this->rocketLaunched) {
            throw new \Exception("Because we can");
        }
    }
}

class Grid {
    /** @var DGDataSource */
    private $source;

    public function displayHouston()
    {
        if ($this->source instanceof DGDataSourceDoctrineJqGridSomething) {
            $this->source->launchRocketIntoSpace();
        }

        $this->source->loadData();
    }
}

}

namespace Problem3
{

interface DataRetriever {

    /**
     * @return mixed[]
     */
    public function retrieveData();
}

class MagicalDataRetriever implements DataRetriever {
    /** @var WebServiceHandle */
    private $webServiceHandle;

    /**
     * MagicalDataRetriever constructor.
     * @param WebServiceHandle $webServiceHandle
     */
    public function __construct(WebServiceHandle $webServiceHandle)
    {
        $this->webServiceHandle = $webServiceHandle;
    }

    public function authenticate(array $arrFormData)
    {
        $this->webServiceHandle->bleh();
    }

    public function retrieveData()
    {
        $this->webServiceHandle->blah();
        throw new VeryCloseToTheMetalWebServiceOJaPierdoleException();
    }
}

class DataProcessor {
    /** @var DataRetriever */
    private $dataRetriever;

    /**
     * DataProcessor constructor.
     * @param DataRetriever $dataRetriever
     */
    public function __construct(DataRetriever $dataRetriever)
    {
        $this->dataRetriever = $dataRetriever;
    }

    public function process()
    {
        $data = $this->dataRetriever->retrieveData();
        return array_values($data);
    }
}
}

namespace Solution3A {

    class DataRetrievalException extends \Exception {}

    interface DataRetriever {

        /**
         * @return mixed[]
         * @throws DataRetrievalException
         */
        public function retrieveData();
    }

    class MagicalDataRetriever implements DataRetriever {
        /** @var WebServiceHandle */
        private $webServiceHandle;

        /**
         * MagicalDataRetriever constructor.
         * @param WebServiceHandle $webServiceHandle
         */
        public function __construct(WebServiceHandle $webServiceHandle)
        {
            $this->webServiceHandle = $webServiceHandle;
        }

        public function authenticate(array $arrFormData)
        {
            $this->webServiceHandle->bleh();
        }

        public function retrieveData()
        {
            try {
                $this->webServiceHandle->blah();
            } catch (VeryCloseToTheMetalWebServiceOJaPierdoleException $ex) {
                throw new DataRetrievalException('hmmm...', 0, $ex);
            }
        }
    }

    class DataProcessor {
        /** @var DataRetriever */
        private $dataRetriever;

        /**
         * DataProcessor constructor.
         * @param DataRetriever $dataRetriever
         */
        public function __construct(DataRetriever $dataRetriever)
        {
            $this->dataRetriever = $dataRetriever;
        }

        public function process()
        {
            try {
                $data = $this->dataRetriever->retrieveData();
                return array_values($data);
            } catch (DataRetrievalException $ex) {
                $this->callToMaciek();
            }
        }
    }
}

namespace Solution3B {

    class DataRetrievalException extends \Exception {}

    interface DataRetriever {

        /**
         * @return mixed[]
         * @throws DataRetrievalException
         */
        public function retrieveData();
    }

    class MagicalDataRetriever implements DataRetriever {
        /** @var WebServiceHandle */
        private $webServiceHandle;

        /**
         * MagicalDataRetriever constructor.
         * @param WebServiceHandle $webServiceHandle
         */
        public function __construct(WebServiceHandle $webServiceHandle)
        {
            $this->webServiceHandle = $webServiceHandle;
        }

        public function authenticate(array $arrFormData)
        {
            $this->webServiceHandle->bleh();
        }

        public function retrieveData()
        {
            try {
                $this->webServiceHandle->blah();
            } catch (VeryCloseToTheMetalWebServiceOJaPierdoleException $ex) {
                throw new DataRetrievalException('hmmm...', 0, $ex);
            }
        }
    }

    class DataProcessor {
        /** @var DataRetriever */
        private $dataRetriever;

        /**
         * DataProcessor constructor.
         * @param DataRetriever $dataRetriever
         */
        public function __construct(DataRetriever $dataRetriever)
        {
            $this->dataRetriever = $dataRetriever;
        }

        public function process()
        {
            try {
                $data = $this->dataRetriever->retrieveData();
                return array_values($data);
            } catch (DataRetrievalException $ex) {
                $this->callToMaciek();
            }
        }
    }

    class MagicalDataRetrieverProxy implements DataRetriever
    {
        /** @var MagicalDataRetriever */
        private $dataRetriever;

        private $arrFormData = [];

        private $authenticated = false;

        /**
         * MagicalDataRetrieverProxy constructor.
         * @param MagicalDataRetriever $dataRetriever
         * @param array $arrFormData
         */
        public function __construct(MagicalDataRetriever $dataRetriever, array $arrFormData)
        {
            $this->dataRetriever = $dataRetriever;
            $this->arrFormData = $arrFormData;
        }

        public function retrieveData()
        {
            if (!$this->authenticated) {
                $this->dataRetriever->authenticate($this->arrFormData);
                $this->authenticated = true;
            }

            return $this->dataRetriever->retrieveData();
        }
    }

    class Consumer {

        public function doSomething()
        {
            $processor = new DataProcessor(
                new MagicalDataRetrieverProxy(
                    new MagicalDataRetriever(
                        new FakeWebServiceHandle()
                    ),
                    ['foo' => 'bar']
                )
            );

            $processor->process();
        }
    }
}