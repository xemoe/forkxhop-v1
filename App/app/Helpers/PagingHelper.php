<?php

namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

class PagingHelper
{
    public function paging(LengthAwarePaginator $paginator)
    {
        $from = ($paginator->currentPage() - 1) * $paginator->perPage() + 1;
        $to = $from + $paginator->count() - 1;
        $total = $paginator->total();

        return  [
            'from' => $from,
            'to' => $to,
            'total' => $total,
        ];
    }

    public function paginate($total, $page, $perpage)
    {
        if (!is_numeric($total)) {
            throw new Exception("Paginate required total row argument");
        }

        if (!is_numeric($page) or $page < 1) {
            $page = 1;
        }

        if (!is_numeric($perpage) or $perpage < 1) {
            $perpage = 10;
        }

        $pages = sprintf('%d', $total / $perpage) + ($total % $perpage == 0 ? 0 : 1);
        $from = 1 + (($page - 1)* $perpage);
        $to = (($page - 1) * $perpage) + ($page === $pages ? $total % $perpage : $perpage);
        $limit = $page == $pages ? ($total % $perpage == 0 ? $perpage : $total % $perpage) : $perpage;

        return compact(['total', 'from', 'to', 'pages', 'page', 'perpage', 'limit']);
    }
}