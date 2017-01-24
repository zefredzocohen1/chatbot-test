<?php

namespace App\Repositories;

use App\Page;

class PageRepository extends BaseRepository
{
	/**
	 * Create a new UserRepository instance.
	 *
   	 * @param  App\User $page
	 * @return void
	 */
	public function __construct(Page $page)
	{
		$this->model = $page;
	}

    /**
     * Create a company.
     *
     * @param  array  $inputs
     * @param  int    $confirmation_code
     * @return App\Page
     */
    public function store($inputs)
    {
        $page = new $this->model;
        $page->user_id        = $inputs['user_id'];
        $this->save($page, $inputs);
        return $page;
    }

	/**
	 * Save the User.
	 *
	 * @param  App\page $page
	 * @param  Array  $inputs
	 * @return void
	 */
  	private function save($page, $inputs)
	{
        $page->fb_page_id       = $inputs['fb_page_id'];
        $page->fb_name          = $inputs['fb_name'];
        $page->fb_email         = $inputs['fb_email'];
        $page->fb_background    = $inputs['fb_background'];
        $page->fb_access_token  = $inputs['fb_access_token'];
        $page->save();
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\page $page
	 * @return void
	 */
	public function update($page, $inputs)
	{
		$this->save($page, $inputs);
		return $page;
	}
}
