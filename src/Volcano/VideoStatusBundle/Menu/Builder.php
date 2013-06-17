<?php

namespace Volcano\VideoStatusBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Knp\Menu\Matcher\Matcher;
use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;
use Knp\Menu\MenuItem;


class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'kwicks');

        $menu->addChild('Home', array('route' => 'home'))->setAttribute('class', 'tab-1');
        $tag = $menu->addChild('Tag', array('route' => 'tag_list'))->setAttribute('class', 'tab-2');

        $tag->addChild('Create', array('route' => 'tag_create'));
        $tag->addChild('List', array('route' => 'tag_list'));

        $clip = $menu->addChild('Clip', array('route' => 'clip_list'))->setAttribute('class', 'tab-3');
        $clip->addChild('Create', array('route' => 'clip_create'));
        $clip->addChild('List', array('route' => 'clip_list'));


        return $menu;
    }
}
