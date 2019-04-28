<?php

namespace TaylorNetwork\Toastr;

/**
 * Laravel Toastr Integration.
 *
 * @url http://codeseven.github.io/toastr
 */
class Toastr
{
    /**
     * Session.
     *
     * @var \Illuminate\Foundation\Application|mixed
     */
    protected $session;

    /**
     * The notifications to fire.
     *
     * @var array
     */
    protected $notifications = [];

    /**
     * The options for Toastr.js
     * These will override any values loaded by config/toastr.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The styles of notifications.
     *
     * @var array
     */
    protected $styles = [];

    /**
     * Load config file...
     */
    public function __construct()
    {
        $this->session = app('session');
        $this->options += config('toastr.options');
        $this->styles += config('toastr.styles');
        $this->notifications += config('toastr.notifications');
    }

    /**
     * Generate a notification style by calling Toastr::style.
     *
     * @param string $method
     * @param array  $args
     *
     * @return void
     */
    public function __call($method, $args)
    {
        switch (count($args)) {
            case 1:
                $this->toSession($method, $args[0], ucfirst($method).'!');
                break;
            case 2:
                $this->toSession($method, $args[0], $args[1]);
                break;
            default:
                break;
        }
    }

    /**
     * Push the generated notification to the session so that it will
     *  persist to the desired page.
     *
     * @param string $style
     * @param string $message
     * @param string $title
     *
     * @return void
     */
    public function toSession($style, $message, $title = null)
    {
        if (in_array($style, $this->styles)) {
            $this->session->push('toastr', ['style' => $style, 'message' => $message, 'title' => $title]);
        }
    }

    /**
     * Get the notifications to fire from the session.
     *
     * @return void
     */
    public function getFromSession()
    {
        if ($this->session->has('toastr')) {
            $toastrMessages = $this->session->get('toastr');
            foreach ($toastrMessages as $toastrMessage) {
                $this->add($toastrMessage['style'], $toastrMessage['message'], $toastrMessage['title']);
            }
            $this->session->forget('toastr');
        }
    }

    /**
     * Push a notification onto the stack.
     *
     * @param string $style
     * @param string $message
     * @param string $title
     *
     * @return void
     */
    public function add($style, $message, $title = null)
    {
        $this->notifications[] = 'toastr.'.$style.'("'.$message.'","'.$title.'");';
    }

    /**
     * Fire the notifications!
     *
     * @return string
     */
    public function render()
    {
        $this->getFromSession();
        $html = '<script>';
        if (!empty($this->options)) {
            foreach ($this->options as $option => $value) {
                $html .= 'toastr.options.'.$option.'='.$value.';';
            }
        }
        foreach ($this->notifications as $notification) {
            $html .= $notification;
        }
        $html .= '</script>';

        return $html;
    }

    /**
     * Empty the notification stack.
     *
     * @return bool
     */
    public function clear()
    {
        $this->notifications = [];

        return true;
    }
}
