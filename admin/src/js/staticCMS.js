$(document).ready(function () {

    function addElement(elementName, type, value, newContentId, sectionId) {
        if (elementName != 'internalName' && elementName != 'Title' && elementName != 'Description' && elementName != 'Description') {
            elementReturn = '<div class="col-6 mb-3">';
            elementReturn =  elementReturn+' <div class="form-group">';
            elementReturn =  elementReturn+' <label>'+elementName+'</label>';
            if (type == 'string') {
                isLink = elementName.indexOf('Link');
                if (isLink !== -1) {
                    elementReturn =  elementReturn+'<br>CHOOSE LINK';
                    elementReturn =  elementReturn+'<input name="content['+sectionId+']['+newContentId+']['+elementName+']" type="text" value="'+value+'" class="form-control" />';
                } else {
                    elementReturn =  elementReturn+'<input name="content['+sectionId+']['+newContentId+']['+elementName+']" type="text" value="'+value+'" class="form-control" />';
                }
            } else if (type == 'text') {
                elementReturn =  elementReturn+'<textarea name="content['+sectionId+']['+newContentId+']['+elementName+']" class="form-control" >'+value+'</textarea>';
            } else if (type == 'image') {
                elementReturn =  elementReturn+'<div class="input-group w-auto">';
                elementReturn =  elementReturn+'<input name="content['+sectionId+']['+newContentId+']['+elementName+']" type="text" value="" class="form-control" />';
                elementReturn =  elementReturn+'<button class="btn btn-primary chooseImage" type="button" data-target="content['+sectionId+']['+newContentId+']['+elementName+']">';
                elementReturn =  elementReturn+'Select';
                elementReturn =  elementReturn+'</button>';
                elementReturn =  elementReturn+'</div>';
            } else if (type == 'link') {
                elementReturn =  elementReturn+'<div class="input-group w-auto">';
                elementReturn =  elementReturn+'<input name="content['+sectionId+']['+newContentId+']['+elementName+']" type="text" value="" class="form-control" />';
                elementReturn =  elementReturn+'<button class="btn btn-primary chooseLink" type="button" data-target="content['+sectionId+']['+newContentId+']['+elementName+']">';
                elementReturn =  elementReturn+'Select';
                elementReturn =  elementReturn+'</button>';
                elementReturn =  elementReturn+'</div>';
            }

            elementReturn =  elementReturn+'</div>';
            elementReturn =  elementReturn+'</div>';
            return elementReturn;
        }
    }

    // check if page edit
    if ($('#pageEdit').length == 1) {

        basicContentElement = $('#basicContentEmpty').html();
        newContentId        = -1;

        $('.addContent').on('click', function () {

            //$(this).closest('.sectionPart').find('.elementForm').find('.row').text('');
            choosenContentType = $(this).closest('div').find('.chooseContentType option:selected').val();
            if (choosenContentType != 'none') {
                sectionId = $(this).closest('.sectionPart').data('id');
                fields = elements[choosenContentType]['fields'];
                $(this).closest('.sectionPart').find('.contentElements').append(basicContentElement);
                $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="-"]').data('contentid', newContentId);
                $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="-"]').attr('data-contentid', newContentId);

                $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="'+newContentId+'"]').find('.elementType').text(choosenContentType);
                $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="'+newContentId+'"]').find('.internalName').attr('name',"content["+sectionId+"]["+newContentId+"][internalName]");
                $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="'+newContentId+'"]').find('.title').attr('name',"content["+sectionId+"]["+newContentId+"][title]");
                $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="'+newContentId+'"]').find('.subTitle').attr('name',"content["+sectionId+"]["+newContentId+"][subTitle]");
                $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="'+newContentId+'"]').find('.type').attr('name',"content["+sectionId+"]["+newContentId+"][type]").val(elements[choosenContentType]['type']);

                for (var item in fields) {
                    addHTML = addElement(item,fields[ item ],'',newContentId, sectionId);
                    $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="'+newContentId+'"]').find('.col-8 .row').append(addHTML);
                }

                /*
                $(this).closest('.sectionPart').find('.elementForm').find('.elementType').text(choosenContentType);

                fields = elements[choosenContentType]['fields'];
                for (var item in fields) {
                    addHTML = addElement(item,fields[ item ],'',sectionId);
                    $(this).closest('.sectionPart').find('.contentTypeInfo').val(choosenContentType);
                    $(this).closest('.sectionPart').find('.elementForm').find('.row').append(addHTML);

                }
                $(this).closest('.sectionPart').find('.elementForm').removeClass('d-none');
                $(this).closest('.sectionPart').find('.elementChoose').addClass('d-none');

                 */
                newContentId--;
            }

        });

        $('.closeElement').on('click', function() {
            $(this).closest('.sectionPart').find('.elementForm').find('.row').text('');
            $(this).closest('.sectionPart').find('.elementForm').addClass('d-none');
            $(this).closest('.sectionPart').find('.elementChoose').removeClass('d-none');
        });

    }

    $(document).on('click', '.selectImage', function(){
        send2target = $('#mediaChoose #target').val();
        actValue    = $(this).attr('src');
        $('input[name="'+send2target+'"]').val(actValue);
        $('#mediaChoose').hide();
    })

    $(document).on('click', '.chooseImage', function(){
        target = $(this).data('target');
        getMediaDatas(target);
    });

    $(document).on('click', '.chooseLink', function(){
        target = $(this).data('target');
        getLinkDatas(target);
    });
});

// MEDIAS
function getMediaDatas(name) {
    $.ajax({
        url: baseLink+"ajax.php?call=getMedias"
    }).done(function(response) {
        mediaDatas = JSON.parse(response);
        imageHTMLDatas = '';
        Object.entries(mediaDatas).forEach(([key, value]) => {
            imageHTMLDatas = imageHTMLDatas + "<div class='col-4'><img src='"+value+"' class='img-fluid btn btn-warning selectImage' /></div>";
        });
        $('#mediaChoose #target').val(name);
        $('#mediaChoose .row').html(' ');
        $('#mediaChoose .row').append(imageHTMLDatas);
    });

    $('#mediaChoose').show();
}

function getLinkDatas(name) {
    $.ajax({
        url: baseLink+"ajax.php?call=getLinks"
    }).done(function(response) {
        mediaDatas = JSON.parse(response);
        imageHTMLDatas = '';
        console.log(mediaDatas);
        /*
        Object.entries(mediaDatas).forEach(([key, value]) => {
            imageHTMLDatas = imageHTMLDatas + "<div class='col-4'><img src='"+value+"' class='img-fluid btn btn-warning selectImage' /></div>";
        });
         */
        $('#linkChoose #target').val(name);
        $('#linkChoose .row').html(' ');
        $('#linkChoose .row').append(imageHTMLDatas);
    });

    $('#linkChoose').show();
}
