<?php

namespace KarlitoWeb\Blurp\Service;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class YAMLService
{
    /**
     * Convert an array to a yaml file.
     *
     * @param string $filepath  The path to the YAML file to be parsed
     * @param array $content
     * @param bool $regenerate
     * @return string
     */
    public static function ArrayToYaml(string $filepath, array $content, bool $regenerate = true): string
    {
        try {
            $yaml = Yaml::dump($content);

            if ($regenerate) {
                file_put_contents($filepath, $yaml);
            } else {
                file_put_contents($filepath, $yaml, FILE_APPEND);
            }

            return $yaml;
        } catch (ParseException $exception) {
            throw new ParseException($exception->getMessage());
        }
    }

    /**
     * Parses a YAML file into a PHP value.
     *
     * @param string $filepath  The path to the YAML file to be parsed
     * @param int $flags        A bit field of PARSE_* constants to customize the YAML parser behavior
     * @return mixed            The YAML converted to a PHP value
     */
    public static function YamlToArray(string $filepath, int $flags = 0): mixed
    {
        $return = [];
        try {
            $return = Yaml::parseFile($filepath, $flags);
        } catch (ParseException $exception) {
            throw new ParseException($exception->getMessage());
        } finally {
            return $return;
        }
    }
}
