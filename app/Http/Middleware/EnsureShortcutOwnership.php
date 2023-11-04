<?php

namespace App\Http\Middleware;

use App\Helpers\PagesVue;
use App\Models\Shortcut;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EnsureShortcutOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $shortcut = $request->route('shortcut');

        if (is_numeric($shortcut)) {
            $shortcut = Shortcut::find($shortcut);
        }

        if (!$shortcut || ($shortcut && $shortcut->user_id === auth()->id())) {
            return $next($request);
        }

        return Inertia::render(PagesVue::PAGE_NO_ACCESS);
    }
}
