import { APP_URL } from "../_config";

export function url(path) {
    if (!APP_URL) {
        throw new Error('APP_URL is not configured.');
    }

    path = path.startsWith('/') ? path : '/' + path; // Ensure a "/" prefix
    path = path.replace(/\/+/g, '/'); // Remove extra slashes
    return `${APP_URL}${path}`;
}

export function storagePath(path) {
    if (!APP_URL) {
        throw new Error('APP_URL is not configured.');
    }
    path = path.startsWith('/') ? path : '/' + path; // Ensure a "/" prefix
    path = path.replace(/\/+/g, '/'); // Remove extra slashes
    return `${APP_URL}/storage${path}`;
}
