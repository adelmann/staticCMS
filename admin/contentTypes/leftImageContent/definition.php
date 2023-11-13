<?php

global $options;
$options                            = [];
$options['name']                    = 'LeftImage';
$options['type']                    = 'leftImageContent';
$options['fields']['internalName']  = 'string';
$options['fields']['Title']         = 'string';
$options['fields']['Description']   = 'text';
$options['fields']['Image']         = 'image';
$options['fields']['ContentText']   = 'text';


function leftImageContentGetElement() {
    global $options;
    return $options;
}
