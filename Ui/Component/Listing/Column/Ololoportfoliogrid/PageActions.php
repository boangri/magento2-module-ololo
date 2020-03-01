<?php
namespace Boangri\Ololo\Ui\Component\Listing\Column\Ololoportfoliogrid;

/**
 * Class PageActions
 */
class PageActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource["data"]["items"])) {
            foreach ($dataSource["data"]["items"] as & $item) {
                $name = $this->getData("name");
                $id = "X";
                if (isset($item["id"])) {
                    $id = $item["id"];
                }
                $item[$name]["view"] = [
                    "href"=>$this->getContext()->getUrl(
                        "ololo/portfolio/edit",
                        ["id"=>$id]
                    ),
                    "label"=>__("Edit")
                ];
            }
        }

        return $dataSource;
    }
}
