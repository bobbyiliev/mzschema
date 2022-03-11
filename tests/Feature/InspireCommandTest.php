<?php

test('install command', function () {
    $this->artisan('install')->assertExitCode(0);
});
