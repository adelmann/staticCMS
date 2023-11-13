<?php

global $options;
$options                            = [];
$options['name']                    = 'Banner';
$options['type']                    = 'bannerContent';
$options['fields']['internalName']  = 'string';
$options['fields']['Title']         = 'string';
$options['fields']['Description']   = 'text';
$options['fields']['Image']         = 'image';
$options['fields']['MainLink']      = 'link';
$options['fields']['ContentTitle']  = 'string';
$options['fields']['ContentText']   = 'text';
$options['fields']['ContentLink']   = 'link';
$options['fields']['Box1Icon']      = 'string';
$options['fields']['Box1Title']     = 'string';
$options['fields']['Box1Text']      = 'text';
$options['fields']['Box2Icon']      = 'string';
$options['fields']['Box2Title']     = 'string';
$options['fields']['Box2Text']      = 'text';
$options['fields']['Box3Icon']      = 'string';
$options['fields']['Box3Title']     = 'string';
$options['fields']['Box3Text']      = 'text';


function bannerContentGetElement() {
    global $options;
    return $options;
}
