<?php
/**
 * Created by SlimApp.
 *
 * Date: 2018-12-03
 * Time: 02:51
 */

namespace Vendor\DynamoTest\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DemoController
{
    public function testAction(Request $request)
    {
        return new JsonResponse(
            [
                'word'      => 'hello guys',
                'client_ip' => $request->getClientIp(),
                'time'      => date("Y-m-d H:i:s", time()),
            ]
        );
    }
}

