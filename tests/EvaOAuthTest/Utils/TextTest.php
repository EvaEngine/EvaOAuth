<?php
/**
 * @author    AlloVince
 * @copyright Copyright (c) 2015 EvaEngine Team (https://github.com/EvaEngine)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */


namespace Eva\EvaOAuthTest\Utils;

use Eva\EvaOAuth\Utils\ResponseParser;
use Eva\EvaOAuth\Utils\Text;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

class TextTest extends \PHPUnit_Framework_TestCase
{

    public function testBaseString()
    {
        $this->assertEquals(
            'POST&http%3A%2F%2Ffoo&callback%3Dhttp%3A%2F%2Fbar',
            Text::getBaseString('post', 'http://foo', ['callback' => 'http://bar'])
        );

        $this->assertEquals('POST&url&foo%3Dbar', Text::getBaseString('post', 'url', ['foo' => 'bar']));

        $this->assertEquals(
            'POST&https%3A%2F%2Fapi.twitter.com%2Foauth%2Frequest_token&oauth_consumer_key%3DX6vZ7YDHiod0hUyTQj0Gw%26oauth_nonce%3Dddb73c89364451560652f53bcd8f14f7%26oauth_signature_method%3DHMAC-SHA1%26oauth_timestamp%3D1428979350%26oauth_version%3D1.0',
            Text::getBaseString('post', 'https://api.twitter.com/oauth/request_token', [
                'oauth_consumer_key' => 'X6vZ7YDHiod0hUyTQj0Gw',
                'oauth_signature_method' => 'HMAC-SHA1',
                'oauth_timestamp' => '1428979350',
                'oauth_nonce' => 'ddb73c89364451560652f53bcd8f14f7',
                'oauth_version' => '1.0',
            ])
        );
    }
}
