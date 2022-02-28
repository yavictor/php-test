<?php

$templates=array(
    array("Id"=>1,"ParentId"=>0,"Attribute"=>"","Text"=>"Корневой шаблон / <%TITLE%>"),
    array("Id"=>2,"ParentId"=>1,"Attribute"=>"<%TITLE%>","Text"=>"Первый подшаблон<br/><
    %CONTENT%>"),
    array("Id"=>3,"ParentId"=>1,"Attribute"=>"<%TITLE%>","Text"=>"Второй подшаблон<br/><
    %CONTENT%>"),
    array("Id"=>4,"ParentId"=>2,"Attribute"=>"<%CONTENT%>","Text"=>"<b>Шаблон 4</b>"),
    array("Id"=>5,"ParentId"=>3,"Attribute"=>"<%CONTENT%>","Text"=>"<b>Шаблон 5</b>"),
    array("Id"=>6,"ParentId"=>2,"Attribute"=>"<%CONTENT%>","Text"=>"<b>Шаблон 6</b>"),
    array("Id"=>7,"ParentId"=>0,"Attribute"=>"","Text"=>"Корневой шаблон №2")
);

function getTemplate($id, $coll = []) {
    $templatesFiltered = array_filter($coll, fn ($el) => $el['ParentId'] === $id);
    $idIndex = array_search($id, array_column($coll, 'Id'));
    $collFiltered = array_filter($coll, fn ($el) => $el['ParentId'] > $id);
    if (count($collFiltered) > 0) {
        $childrenText =  array_reduce($templatesFiltered, fn ($acc, $el) => $acc .= $el['Text'], '');
        $coll[$idIndex]["Attribute"] = $childrenText;
    }

    if (count($templatesFiltered) > 0 && count($collFiltered) > 0) {
        var_dump($templatesFiltered);
        return array_map(getTemplate($id + 1, $collFiltered), $templatesFiltered);
    }
    return $coll;

};
