<?php
/**
 * This file is part of php-tools.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright   Copyright (c) Mirko Pagliai
 * @link        https://github.com/mirko-pagliai/php-tools
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 * @since       1.1.3
 */
namespace Tools;

use DOMDocument;
use Psr\Http\Message\StreamInterface;

/**
 * A body parser.
 *
 * It can tell if a body contains HTML code and can extract links from body.
 */
class BodyParser
{
    /**
     * Body
     * @var string
     */
    protected $body;

    /**
     * Extracted links. This property works as a cache of values. A `null` value
     *  indicates that the links have not yet been extracted
     * @var array
     */
    protected $extractedLinks = [];

    /**
     * HTML tags that may contain links and therefore need to be scanned.
     *
     * Array with tag names as keys and attribute names as values.
     * @var array
     */
    protected $tags = [
        'a' => 'href',
        'area' => 'href',
        'audio' => 'src',
        'embed' => 'src',
        'frame' => 'src',
        'iframe' => 'src',
        'img' => 'src',
        'link' => 'href',
        'script' => 'src',
        'source' => 'src',
        'track' => 'src',
        'video' => 'src',
    ];

    /**
     * Reference url. Used to determine the relative links
     * @var string
     */
    protected $url;

    /**
     * Constructor
     * @param string|StreamInterface $body Body as string or `StreamInterface`
     * @param string $url Reference url. Used to determine the relative links
     * @uses $body
     * @uses $url
     */
    public function __construct($body, $url)
    {
        $this->body = $body instanceof StreamInterface ? (string)$body : $body;
        $this->url = $url;
    }

    /**
     * Extracs links from body
     * @return array
     * @uses $body
     * @uses $extractedLinks
     * @uses $tags
     * @uses $url
     */
    public function extractLinks()
    {
        if ($this->extractedLinks) {
            return $this->extractedLinks;
        }

        if (!is_html($this->body)) {
            return [];
        }

        $libxmlPreviousState = libxml_use_internal_errors(true);

        $dom = new DOMDocument;
        $dom->loadHTML($this->body);

        libxml_clear_errors();
        libxml_use_internal_errors($libxmlPreviousState);

        $links = [];

        foreach ($this->tags as $tag => $attribute) {
            foreach ($dom->getElementsByTagName($tag) as $element) {
                $link = $element->getAttribute($attribute);

                if (!$link) {
                    continue;
                }

                $links[] = clean_url(url_to_absolute($this->url, $link), true, true);
            }
        }

        return $this->extractedLinks = array_unique($links);
    }
}
