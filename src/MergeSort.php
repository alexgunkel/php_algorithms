<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 08.03.18
 * Time: 22:59
 */

namespace Alex\Sort;


use Alex\Sort\Lib\MergeFunction;

class MergeSort implements Sorter
{
    use MergeFunction;

    /**
     * @param array $sortables
     * @return array
     */
    public function __invoke(array &$sortables): void
    {
        $sortables = $this->sort($sortables);
    }

    /**
     * Basic sorting method
     *
     * @param array $sortables
     *
     * @return array
     */
    private function sort(array $sortables): array
    {
        $length = count($sortables);
        if ($length === 1) {
            return $sortables;
        }

        $length /= 2;
        return $this->merge(
            $this->sort(array_slice($sortables, 0, $length)),
            $this->sort(array_slice($sortables, $length))
        );
    }
}