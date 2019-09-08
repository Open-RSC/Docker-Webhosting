<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Abstract class for the transformations plugins.
 */

namespace PhpMyAdmin\Plugins;

/**
 * Provides a common interface that will have to
 * be implemented by all of the transformations plugins.
 */
abstract class TransformationsPlugin implements TransformationsInterface
{
    /**
     * Does the actual work of each specific transformations plugin.
     *
     * @param array $options transformation options
     *
     * @return void
     */
    public function applyTransformationNoWrap(array $options = [])
    {
    }

    /**
     * Does the actual work of each specific transformations plugin.
     *
     * @param string $buffer  text to be transformed
     * @param array  $options transformation options
     * @param string $meta    meta information
     *
     * @return string the transformed text
     */
    abstract public function applyTransformation(
        $buffer,
        array $options = [],
        $meta = ''
    );

    /**
     * Returns passed options or default values if they were not set.
     *
     * @param string[] $options  List of passed options
     * @param string[] $defaults List of default values
     *
     * @return string[] List of options possibly filled in by defaults.
     */
    public function getOptions(array $options, array $defaults)
    {
        $result = [];
        foreach ($defaults as $key => $value) {
            if (isset($options[$key]) && $options[$key] !== '') {
                $result[$key] = $options[$key];
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}
