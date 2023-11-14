{% extends views/layout.tpl %}
{% block title %}Home Page{% endblock %}

{% block content %}
<script>
    var elements = [];
    {% foreach($types as $type): %}
        elements['{{$type['type']}}'] = [];
        elements['{{$type['type']}}']['name'] = '{{$type['name']}}';
        elements['{{$type['type']}}']['type'] = '{{$type['type']}}';
        elements['{{$type['type']}}']['fields'] = [];
        {% foreach($type['fields'] as $key=>$field): %}
            elements['{{$type['type']}}']['fields']['{{$key}}'] = '{{$field}}';
        {% endforeach; %}
{% endforeach; %}
</script>
<form action="page.php" method="POST" id="pageEdit">
    <input type="hidden" name="fnc" value="update" />
    <input type="hidden" name="id" value="{{ $page['id'] }}" />
    <div class="card mb-3">
        <div class="card-header">Seite: {{ $page['internalName'] }}</div>
        <div class="card-body">
            <div class="mb-3">
                <label for="internalName" class="form-label">Interner Name</label>
                <input type="text" name="internalName" class="form-control" id="internalName" placeholder="Interner Name" value="{{ $page['internalName'] }}">
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Titel/Name" value="{{ $page['title'] }}">
                </div>
                <div class="col-6">
                    <label for="subTitle" class="form-label">Untertitel</label>
                    <input type="text" name="subTitle" class="form-control" id="subTitle" placeholder="subTitle/Untertitel" value="{{ $page['subTitle'] }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Keyword1,Keyword2,Keyword3" value="{{ $page['keywords'] }}">
                </div>
                <div class="col-6">
                    <label for="description" class="form-label">Beschreibung</label>
                    <textarea class="form-control" name="description">{{ $page['description'] }}</textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary fixedSaveButton" value="speichern">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body text-center">
            Neue Sektion: <span class="newSection btn btn-outline-primary">+</span>
        </div>
    </div>
    {% foreach($sections as $section): %}
        <div class="card mb-3 sectionPart" data-id="{{ $section['id'] }}">
            <div class="card-header">Sektion: {{$section['internalName']}}</div>
            <div class="card-body text-center">
                <input type="hidden" name="section[{{$section['id']}}][sort]" value="{{ $section['sort'] }}" />
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="internalName" class="form-label">Interner Name</label>
                        <input type="text" name="section[{{$section['id']}}][internalName]" class="form-control" id="internalName" placeholder="Interner Name" value="{{ $section['internalName'] }}">
                    </div>
                    <div class="col-6">
                        <label for="classes" class="form-label">CSS Klassen</label>
                        <input type="text" name="section[{{$section['id']}}][classes]" class="form-control" id="classes" placeholder="dark,fullsize" value="{{ $section['classes'] }}">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="section[{{$section['id']}}][title]" class="form-control" id="title" placeholder="Titel/Name" value="{{ $section['title'] }}">
                    </div>
                    <div class="col-6">
                        <label for="subTitle" class="form-label">Untertitel</label>
                        <input type="text" name="section[{{$section['id']}}][subTitle]" class="form-control" id="subTitle" placeholder="subTitle/Untertitel" value="{{ $section['subTitle'] }}">
                    </div>
                </div>
                <div class="row mb-3 justify-content-md-center">
                    <div class="col-12"><hr></div>
                    <div class="col-6 elementChoose">
                        Neues Element:
                        <div class="input-group w-auto">
                            <select class="chooseContentType form-control">
                                <option value="none">Bitte wählen</option>
                                {% foreach($types as $type): %}
                                <option value="{{ $type['type'] }}">{{ $type['name'] }}</option>
                                {% endforeach; %}
                            </select>
                            <button class="btn btn-primary addContent" type="button">
                                Hinzufügen
                            </button>
                        </div>
                    </div>
                    <div class="col-12 elementForm">
                        <div class="contentElements">---</div>
                        {% $sectionContent = getSectionContentByPage($page['id'],$section['id']) %}

                        {% if (!empty($sectionContent)) { %}
                            {% foreach($sectionContent as $key=>$data): %}
                                <div class="alert alert-warning m-3">
                                    <h3 class="elementType">
                                        {% if ($data != null) { %}
                                            {{ $data['type'] }}
                                        {% } else { %}
                                        ---
                                        {% } %}
                                    </h3>
                                    <div class="row">
                                        <div class="col-4 text-sm-start">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Interner name</label>
                                                <input type="text" class="form-control" name="content[{{$section['id']}}][{{$data['id']}}][internalName]" value="{{$data['internalName']}}" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">Titel</label>
                                                <input type="text" class="form-control" name="content[{{$section['id']}}][{{$data['id']}}][title]" value="{{$data['title']}}" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">Untertitel</label>
                                                <input type="text" class="form-control" name="content[{{$section['id']}}][{{$data['id']}}][subTitle]" value="{{$data['subTitle']}}" />
                                            </div>
                                            <input type="hidden" class="type" name="content[{{$section['id']}}][{{$data['id']}}][type]" value="{{$data['type']}}" />
                                        </div>
                                        <div class="col-8">
                                            {% $tmpContentDatas = json_decode($data['content']) %}
                                            {% $type = $data['type'] %}
                                            {% $choosenType = $types[$type] %}
                                            {% $fields = $choosenType['fields'] %}
                                            {% unset($fields['internalName']) %}
                                            {% unset($fields['Title']) %}
                                            {% unset($fields['Description']) %}

                                            <div class="row">
                                                {% foreach($tmpContentDatas as $key=>$contentData): %}
                                                    <div class="col-6 mb-3">
                                                        <div class="form-group">
                                                            <label>{{ $key }}</label>
                                                            {% if ($fields[$key] == 'image') { %}
                                                                <div class="input-group w-auto">
                                                                    <input name="content[{{$section['id']}}][{{$data['id']}}][{{$key}}]" type="text" value="{{$contentData}}" class="form-control" />
                                                                    <button class="btn btn-primary chooseImage" type="button" data-target="content[{{$section['id']}}][{{$data['id']}}][{{$key}}]">
                                                                        Select
                                                                    </button>
                                                                </div>
                                                            {% } elseif ($fields[$key] == 'text') { %}
                                                                <textarea name="content[{{$section['id']}}][{{$data['id']}}][{{$key}}]" class="form-control" >{{$contentData}}</textarea>
                                                            {% } elseif ($fields[$key] == 'string') { %}
                                                                <input name="content[{{$section['id']}}][{{$data['id']}}][{{$key}}]" type="text" value="{{$contentData}}" class="form-control" />
                                                            {% } elseif ($fields[$key] == 'link') { %}
                                                                <div class="input-group w-auto">
                                                                    <input name="content[{{$section['id']}}][{{$data['id']}}][{{$key}}]" type="text" value="{{$contentData}}" class="form-control" />
                                                                    <button class="btn btn-primary chooseLink" type="button" data-target="content[{{$section['id']}}][{{$data['id']}}][{{$key}}]">
                                                                        Select
                                                                    </button>
                                                                </div>
                                                            {% } %}
                                                        </div>
                                                    </div>
                                                {% endforeach; %}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            {% endforeach; %}
                        {% } %}
                    </div>
                </div>
            </div>
        </div>
    {% endforeach; %}

    <div class="card mb-3">
        <div class="card-body text-center">
            Neue Sektion: <span class="newSection btn btn-outline-primary">+</span>
        </div>
    </div>

</form>

<div id="basicContentEmpty" class="d-none">
    <div class="alert alert-warning m-3" data-contentid="-">
        <h3 class="elementType">
        </h3>
        <div class="row">
            <div class="col-4 text-sm-start">
                <div class="form-group mb-3">
                    <label class="form-label">Interner name</label>
                    <input type="text" class="form-control internalName" name="" value="" />
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Titel</label>
                    <input type="text" class="form-control title" name="" value="" />
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Untertitel</label>
                    <input type="text" class="form-control subTitle" name="" value="" />
                </div>
                <input type="hidden" class="type" name="" value="" />
            </div>
            <div class="col-8">
                <div class="row"></div>
            </div>
        </div>
    </div>
</div>

{% include 'views/widget/mediaModal.tpl' %}
{% include 'views/widget/linkModal.tpl' %}

{% endblock %}
