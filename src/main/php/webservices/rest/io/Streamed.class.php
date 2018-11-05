<?php namespace webservices\rest\io;

class Streamed extends Transfer {

  public function writer($request, $payload, $format, $marshalling) {
    $request->setHeader('Transfer-Encoding', 'chunked');
    return function($stream) use($payload, $format, $marshalling) {
      return $format->serialize($marshalling->marshal($payload), $stream);
    };
  }
}