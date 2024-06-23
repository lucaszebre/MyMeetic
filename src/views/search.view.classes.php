<?php

class SearchView extends searchController
{
    public function showSearchResult()
    {
        $data = $this->searchPost();
        echo '<div class="flex flex-col justify-center">';
        echo '<div class="w-[800px] overflow-hidden">';
        echo '<section id="carousel" class="flex relative whitespace-nowrap shrink-0 flex-row w-[800px] max-h-[400px] h-full w-full">';
        if (count($data) > 0) {
            foreach ($data as $row) {
                echo '<div class="carrouselchild flex shrink-0 flex-row max-w-[800px] max-h-[260px] h-full w-full mt-[20px] mb-[50px] gap-40 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">';
                echo '<div class="relative inline-flex items-center justify-center w-40 h-40 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">';
                echo '<span class="font-bold text-lg text-gray-600 dark:text-gray-300">' . substr($row["firstname"], 0, 1) . ' ' . substr($row["lastname"], 0, 1) . '</span>';
                echo '</div>';
                echo '<div class="w-full h-full">';
                echo '<a href="#"><h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">' . $row["firstname"] . ' ' . $row["lastname"] . '</h5></a>';
                echo '<a href="#"><h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Birth date: ' . $row["birthdate"] . '</h5></a>';
                echo '<a href="#"><h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Genre: ' . $row["genre"] . '</h5></a>';
                echo '<a href="#"><h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">City: ' . $row["city"] . '</h5></a>';
                echo '<a href="#"><h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Passion: ' . $row["passion"] . '</h5></a>';
                echo '<a id="sendMessage" href="mailto:' . $row["email"] . '" class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Contact</a>';            
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="flex mt-10 items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">';
            echo '<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
            echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>';
            echo '</svg>';
            echo '<span class="sr-only">Info</span>';
            echo '<div>';
            echo '<span class="font-medium">No user found</span>';
            echo '</div>';
            echo '</div>';
        }

        echo '</section>';
        echo '</div>';
        echo '</div>';

        echo '<footer class="flex flex-rox w-full justify-center mt-[30px] mb-2 items-center" aria-label="Page navigation ">';
        echo '<div class="flex items-center flex-row gap-3 ">';
        echo '<a id="previous" class="flex cursor-pointer items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">';
        echo '<svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">';
        echo '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>';
        echo '</svg>';
        echo 'Previous';
        echo '</a>';
        echo '<a id="next" class="flex cursor-pointer items-center justify-center px-4 h-10 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">';
        echo 'Next';
        echo '<svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">';
        echo '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>';
        echo '</svg>';
        echo '</a>';
        echo '</div>';
        echo '</footer>';
    }
}

   
