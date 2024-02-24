<?php

    function getAppVersion(): string
    {
        try {
            return trim(file_get_contents(storage_path('VERSION')));
        }

        catch (ErrorException $ex)
        {
            return 'undefined';
        }

    }

    function chr_newline(): string
    {
        return chr(13) . chr(10);
    }
