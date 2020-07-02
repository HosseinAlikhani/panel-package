<?php

namespace D3CR33\Panel\Http\Controllers;

class PanelController
{
    public function getPanel()
    {
        return view('Panel::index');
    }
}
