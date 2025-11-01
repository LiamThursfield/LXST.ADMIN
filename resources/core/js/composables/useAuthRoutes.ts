import {route} from 'ziggy-js';
import {useTenant} from "@/core/js/composables/useTenant";

export function useAuthRoutes() {
    const { isTenant } = useTenant();

    const routes = {
        login: 'login',
        loginStore: 'login.store',
        logout: 'logout',
        register: 'register',
        registerStore: 'register.store',
        passwordRequest: 'password.request',
        passwordEmail: 'password.email',
        passwordReset: 'password.reset',
        passwordStore: 'password.store',
        verificationNotice: 'verification.notice',
        verificationVerify: 'verification.verify',
        verificationSend: 'verification.send',
        passwordConfirm: 'password.confirm',
    };

    const resolveRoute = (name: string): string | null => {
        // If there is not tenant, check for central routes
        if (!isTenant.value) {
            const centralName = `central.${name}`;
            if (route().has(centralName)) {
                return centralName;
            }

            return null;
        }

        if (route().has(name)) {
            return name;
        }

        return null;
    };

    // Login
    function loginRouteExists(): boolean {
        return resolveRoute(routes.login) !== null;
    }

    function getLoginRoute(): string | null {
        const routeName = resolveRoute(routes.login);
        return routeName ? route(routeName) : null;
    }

    // Login Store
    function loginStoreRouteExists(): boolean {
        return resolveRoute(routes.loginStore) !== null;
    }

    function getLoginStoreRoute(): string | null {
        const routeName = resolveRoute(routes.loginStore);
        return routeName ? route(routeName) : null;
    }

    // Logout
    function logoutRouteExists(): boolean {
        return resolveRoute(routes.logout) !== null;
    }

    function getLogoutRoute(): string | null {
        const routeName = resolveRoute(routes.logout);
        return routeName ? route(routeName) : null;
    }

    // Register
    function registerRouteExists(): boolean {
        return resolveRoute(routes.register) !== null;
    }

    function getRegisterRoute(): string | null {
        const routeName = resolveRoute(routes.register);
        return routeName ? route(routeName) : null;
    }

    // Register Store
    function registerStoreRouteExists(): boolean {
        return resolveRoute(routes.registerStore) !== null;
    }

    function getRegisterStoreRoute(): string | null {
        const routeName = resolveRoute(routes.registerStore);
        return routeName ? route(routeName) : null;
    }

    // Password Request
    function passwordRequestRouteExists(): boolean {
        return resolveRoute(routes.passwordRequest) !== null;
    }

    function getPasswordRequestRoute(): string | null {
        const routeName = resolveRoute(routes.passwordRequest);
        return routeName ? route(routeName) : null;
    }

    // Password Email
    function passwordEmailRouteExists(): boolean {
        return resolveRoute(routes.passwordEmail) !== null;
    }

    function getPasswordEmailRoute(): string | null {
        const routeName = resolveRoute(routes.passwordEmail);
        return routeName ? route(routeName) : null;
    }

    // Password Reset
    function passwordResetRouteExists(): boolean {
        return resolveRoute(routes.passwordReset) !== null;
    }

    function getPasswordResetRoute(params: any): string | null {
        const routeName = resolveRoute(routes.passwordReset);
        return routeName ? route(routeName, params) : null;
    }

    // Password Store
    function passwordStoreRouteExists(): boolean {
        return resolveRoute(routes.passwordStore) !== null;
    }

    function getPasswordStoreRoute(): string | null {
        const routeName = resolveRoute(routes.passwordStore);
        return routeName ? route(routeName) : null;
    }

    // Verification Notice
    function verificationNoticeRouteExists(): boolean {
        return resolveRoute(routes.verificationNotice) !== null;
    }

    function getVerificationNoticeRoute(): string | null {
        const routeName = resolveRoute(routes.verificationNotice);
        return routeName ? route(routeName) : null;
    }

    // Verification Verify
    function verificationVerifyRouteExists(): boolean {
        return resolveRoute(routes.verificationVerify) !== null;
    }

    function getVerificationVerifyRoute(params: any): string | null {
        const routeName = resolveRoute(routes.verificationVerify);
        return routeName ? route(routeName, params) : null;
    }

    // Verification Send
    function verificationSendRouteExists(): boolean {
        return resolveRoute(routes.verificationSend) !== null;
    }

    function getVerificationSendRoute(): string | null {
        const routeName = resolveRoute(routes.verificationSend);
        return routeName ? route(routeName) : null;
    }

    // Password Confirm
    function passwordConfirmRouteExists(): boolean {
        return resolveRoute(routes.passwordConfirm) !== null;
    }

    function getPasswordConfirmRoute(): string | null {
        const routeName = resolveRoute(routes.passwordConfirm);
        return routeName ? route(routeName) : null;
    }

    return {
        loginRouteExists,
        getLoginRoute,
        loginStoreRouteExists,
        getLoginStoreRoute,
        logoutRouteExists,
        getLogoutRoute,
        registerRouteExists,
        getRegisterRoute,
        registerStoreRouteExists,
        getRegisterStoreRoute,
        passwordRequestRouteExists,
        getPasswordRequestRoute,
        passwordEmailRouteExists,
        getPasswordEmailRoute,
        passwordResetRouteExists,
        getPasswordResetRoute,
        passwordStoreRouteExists,
        getPasswordStoreRoute,
        verificationNoticeRouteExists,
        getVerificationNoticeRoute,
        verificationVerifyRouteExists,
        getVerificationVerifyRoute,
        verificationSendRouteExists,
        getVerificationSendRoute,
        passwordConfirmRouteExists,
        getPasswordConfirmRoute,
    };
}
