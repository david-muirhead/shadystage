<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class general extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'General';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'General | Options';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $general = new FieldsBuilder('general');

        $general
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $general->build();
    }
}
