<?php

namespace App\Entities;

enum AnimationTypes: string
{
    case IMMEDIATE = 'immediate';
    case X_OPEN = 'x_open';
    case CURTAIN_UP = 'curtain_up';
    case CURTAIN_DOWN = 'curtain_down';
    case SCROLL_LEFT = 'scroll_left';
    case SCROLL_RIGHT = 'scroll_right';
    case VERTICAL_OPEN = 'vertical_open';
    case VERTICAL_CLOSE = 'vertical_close';
    case SCROLL_UP = 'scroll_up';
    case SCROLL_DOWN = 'scroll_down';
    case HOLD = 'hold';
    case SNOW = 'snow';
    case TWINKLE = 'twinkle';
    case BLOCK_MOVE = 'block_move';
    case RANDOM = 'random';
}
