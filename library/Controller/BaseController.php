<?php

namespace Hoor\Controller;

class BaseController extends \Municipio\Controller\Basecontroller
{
    public function getFooterLayout()
    {
        switch (get_field('footer_layout', 'option')) {
            case 'compressed':
                $this->data['footerLayout'] = 'compressed';
                break;
            case 'hoor':
                $this->data['footerLayout'] = 'hoor';
                break;

            default:
                $this->data['footerLayout'] = 'default';
                break;
        }
    }
}
