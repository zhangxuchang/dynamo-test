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
                'headers'   => $request->headers->all(),
            ]
        );
    }

    public function slowRequestAction($sec)
    {
        $sleepTime = 3;
        if ($sec > 0) {
            $sleepTime = $sec;
        }

        minfo('sleep %s seconds before work', $sleepTime);
        sleep($sleepTime);
        minfo('weekup after sleep %s seconds', $sleepTime);

        return new JsonResponse(
            [
                'msg' => 'sleep test val:'.$sleepTime,
            ]
        );
    }
}

