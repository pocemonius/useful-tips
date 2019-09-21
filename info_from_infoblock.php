<?
CModule::IncludeModule("iblock");

$db_Iblock = CIBlock::GetList(  array(),   array("CODE"=> "PRODUCTS_DOCUMENTS"));
if($ar_Iblock =$db_Iblock -> Fetch())
{

    $db_section = CIBlockSection::GetList( array ("SORT"=>"ASC"),Array("IBLOCK_ID" => $ar_Iblock["ID"], "ACTIVE"=> "Y"));
    while( $ar_section  =  $db_section -> Fetch())
        {

            ?>
                <tr>
                    <td class="title" colspan="2"><?=$ar_section["NAME"]?></td>
                </tr>    
            <?


            $db_els = CIBlockElement::GetList(Array(),Array("IBLOCK_ID" => $ar_Iblock["ID"], "ACTIVE"=> "Y", "IBLOCK_SECTION_ID"=> $ar_section["ID"]));
            while($ar_els = $db_els-> Fetch())
                {
                    ?>
                        <tr>                            
                            <td><?=$ar_els["PREVIEW_TEXT"]?></td>
                            <td><?=$ar_els["NAME"]?></td>
                        </tr>
                    <?
                }
        }

}
?>
