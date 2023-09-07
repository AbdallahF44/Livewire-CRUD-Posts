<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $title, $body, $post_edit_id, $post_delete_id;
    public $view_post_title, $view_post_body;


    protected $rules = [
        'title' => 'required|min:3',
        'body' => 'required|min:10',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function storePostData()
    {
        $this->validate();
        Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        toastr()->success(ucfirst($this->title) . " Post Added Successfully.");

        $this->title = '';
        $this->body = '';

        //For hide modal after add post success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editPost($id)
    {
        $post = Post::where('id', $id)->first();

        $this->post_edit_id = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->dispatchBrowserEvent('show-edit-post-modal');
    }

    public function editPostData()
    {
        $this->validate();
        Post::where('id', $this->post_edit_id)->first()->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        toastr()->success(ucfirst($this->title) . " Post Edited Successfully.");

        $this->close();
        //For hide modal after add post success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->post_delete_id = $id; //post id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deletePostData()
    {
        Post::destroy($this->post_delete_id);

        toastr()->success(ucfirst($this->title) . " Post Deleted Successfully.");

        $this->dispatchBrowserEvent('close-modal');

        $this->post_delete_id = '';
    }

    public function cancel()
    {
        $this->post_delete_id = '';
    }

    public function viewPostDetails($id)
    {
        $post = Post::where('id', $id)->first();

        $this->view_post_title = $post->title;
        $this->view_post_body = $post->body;

        $this->dispatchBrowserEvent('show-view-post-modal');
    }

    public function closeViewPostModal()
    {
        $this->view_post_title = '';
        $this->view_post_body = '';
    }

    public function close()
    {
        $this->reset();
    }

    public function render()
    {
        $posts = Post::all();
        return view('livewire.posts', ['posts' => $posts])->layout('livewire.layouts.all_posts');
    }
}
