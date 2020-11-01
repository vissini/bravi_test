<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalancedBracketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin/pages/balanced_brackets/index');
    }

    public function checkBrackets(Request $request)
    {
        if ($request->isMethod('post')) {
            $isValid = true;
            $string = $request->input('balanced_bracket');
            if( $this->_checkBrackets($string) ) {
                return redirect(route('balancedBracket.index'))->with("success","Is Balanced");
            } else {
                return redirect(route('balancedBracket.index'))->with("error","NOT is Balanced");
            }
        } else {
            return redirect(route('balancedBracket.index'))->with("error","NOT is Balanced");
        }
    }

    private function _checkBrackets(string $string): bool
    {
        $opposite = [
            '(' => ')',
            '[' => ']',
            '{' => '}',
        ];
        $charArray = str_split($string);
        $stack = new \SplStack();
        foreach ($charArray as $char) {
            if ($char === '(' || $char === '[' || $char === '{') {
                $stack->push($char);
                continue;
            }
            if ($char === ')' || $char === ']' || $char === '}') {
                try {
                    $last = $stack->pop();
                    if ($opposite[$last] !== $char) {
                        return false;
                    }
                } catch (\Exception $e) {
                    return false;
                }
                continue;
            }
        }
        return $stack->isEmpty();
    }

}
