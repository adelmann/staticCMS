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
                } else {
                    elementReturn =  elementReturn+'<input name="content['+sectionId+']['+newContentId+']['+elementName+']" type="text" value="'+value+'" class="form-control" />';
                }
            } else if (type == 'text') {
                elementReturn =  elementReturn+'<textarea name="content['+sectionId+']['+newContentId+']['+elementName+']" class="form-control" >'+value+'</textarea>';
            } else if (type == 'image') {
                elementReturn =  elementReturn+'<br> CHOOSE IMAGE';
                elementReturn =  elementReturn+'<input name="content['+sectionId+']['+newContentId+']['+elementName+']" type="text" value="'+value+'" class="form-control" />';
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
                    console.log(addHTML);
                    $(this).closest('.sectionPart').find('.contentElements').find('.alert[data-contentid="'+newContentId+'"]').find('.col-8 .row').append(addHTML);
                    //$(this).closest('.sectionPart').find('.contentTypeInfo').val(choosenContentType);
                    //$(this).closest('.sectionPart').find('.elementForm').find('.row').append(addHTML);

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

});
