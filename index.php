<?php

use Kirby\Cms\App as Kirby;
use Kirby\Toolkit\I18n;

Kirby::plugin('lemmon/kirby-panel-buttons', [
    'fields' => [
        'buttons' => [
            'props' => [
                'label'     => fn ( string $x = 'Button'     ) => I18n::translate($x, $x, kirby()->user()?->language()),
                'text'      => fn ( string $x = 'Click here' ) => I18n::translate($x, $x, kirby()->user()?->language()),
                'help'      => fn ( string $x = null         ) => I18n::translate($x, $x, kirby()->user()?->language()),
                'url'       => fn ( string $x = '/'          ) => $x,
                'theme'     => fn ( string $x = null         ) => $x,
                'fullwidth' => fn ( bool   $x = false        ) => $x,
                'size'      => fn ( string $x = 'lg'         ) => $x,
                'icon'      => fn ( string $x = null         ) => $x,
                'disabled'  => fn ( bool   $x = false        ) => $x,
                'open'      => fn ( bool   $x = false        ) => $x,
                'reload'    => fn ( bool   $x = false        ) => $x,
            ],
            'computed' => [
                'text' => fn () => $this->model()->toSafeString($this->text),
                'url'  => fn () => $this->model()->toSafeString($this->url),
            ],
        ],
    ],
]);
