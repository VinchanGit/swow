<?php
/**
 * This file is part of Swow
 *
 * @link     https://github.com/s-wow/swow
 * @contact  twosee <twose@qq.com>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code
 */

declare(strict_types=1);

namespace Swow\Http\Server;

class Response extends \Swow\Http\Response
{
    protected $headers = ['Server' => 'swow'];

    public function error(int $statusCode, string $reasonPhrase = ''): self
    {
        $this
            ->setStatus($statusCode, $reasonPhrase)
            ->getBody()->clear()
            ->write('<html lang="en"><body><h2>HTTP ')->write((string) $statusCode)->write(' ')->write($reasonPhrase)->write("</h2><hr><i>Powered by Swow</i></body></html>\r\n");

        return $this;
    }
}