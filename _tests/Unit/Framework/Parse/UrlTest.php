<?php
/**
 * @author           Pierre-Henry Soria <hello@ph7cms.com>
 * @copyright        (c) 2017, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / Test / Unit / Framework / Config
 */

namespace PH7\Test\Unit\Framework\Parse;

use PH7\Framework\Parse\Url as UrlParser;
use PHPUnit_Framework_TestCase;

class UrlTest extends PHPUnit_Framework_TestCase
{
    public function testClean()
    {
        $sUrl = 'https://ph7cms.com/my-route & the new_2£POST!';
        $sExpected = 'https//ph7cmscom/my-route-&-the-new_2-post';

        $this->assertSame($sExpected, UrlParser::clean($sUrl));
    }

    /**
     * @param string $sUrl
     * @param string $sExpected
     *
     * @dataProvider urlsNamesProvider
     */
    public function testName($sUrl, $sExpected)
    {
        $this->assertSame($sExpected, UrlParser::name($sUrl));
    }

    /**
     * @return array
     */
    public function urlsNamesProvider()
    {
        return [
            ['https://ph7cms.com', 'Ph7cms'],
            ['https://ph7cms.com/dating-business-by-steps/', 'Ph7cms.com/dating-business-by-steps/'],
            ['https://www.ph7cms.com?myparam=value-foo-bar', 'Ph7cms.com?myparam=value-foo-bar']
        ];
    }
}