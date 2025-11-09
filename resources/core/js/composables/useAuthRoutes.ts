import {route} from 'ziggy-js';
import {useRoutes} from "@/core/js/composables/useRoutes";

export function useAuthRoutes() {
    const {resolveRouteName} = useRoutes();

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

    // Login
    function loginRouteExists(): boolean {
        return resolveRouteName(routes.login) !== null;
    }

    function getLoginRoute(): string | null {
        const routeName = resolveRouteName(routes.login);
        return routeName ? route(routeName) : null;
    }

    // Login Store
    function loginStoreRouteExists(): boolean {
        return resolveRouteName(routes.loginStore) !== null;
    }

    function getLoginStoreRoute(): string | null {
        const routeName = resolveRouteName(routes.loginStore);
        return routeName ? route(routeName) : null;
    }

    // Logout
    function logoutRouteExists(): boolean {
        return resolveRouteName(routes.logout) !== null;
    }

    function getLogoutRoute(): string | null {
        const routeName = resolveRouteName(routes.logout);
        return routeName ? route(routeName) : null;
    }

    // Register
    function registerRouteExists(): boolean {
        return resolveRouteName(routes.register) !== null;
    }

    function getRegisterRoute(): string | null {
        const routeName = resolveRouteName(routes.register);
        return routeName ? route(routeName) : null;
    }

    // Register Store
    function registerStoreRouteExists(): boolean {
        return resolveRouteName(routes.registerStore) !== null;
    }

    function getRegisterStoreRoute(): string | null {
        const routeName = resolveRouteName(routes.registerStore);
        return routeName ? route(routeName) : null;
    }

    // Password Request
    function passwordRequestRouteExists(): boolean {
        return resolveRouteName(routes.passwordRequest) !== null;
    }

    function getPasswordRequestRoute(): string | null {
        const routeName = resolveRouteName(routes.passwordRequest);
        return routeName ? route(routeName) : null;
    }

    // Password Email
    function passwordEmailRouteExists(): boolean {
        return resolveRouteName(routes.passwordEmail) !== null;
    }

    function getPasswordEmailRoute(): string | null {
        const routeName = resolveRouteName(routes.passwordEmail);
        return routeName ? route(routeName) : null;
    }

    // Password Reset
    function passwordResetRouteExists(): boolean {
        return resolveRouteName(routes.passwordReset) !== null;
    }

    function getPasswordResetRoute(params: any): string | null {
        const routeName = resolveRouteName(routes.passwordReset);
        return routeName ? route(routeName, params) : null;
    }

    // Password Store
    function passwordStoreRouteExists(): boolean {
        return resolveRouteName(routes.passwordStore) !== null;
    }

    function getPasswordStoreRoute(): string | null {
        const routeName = resolveRouteName(routes.passwordStore);
        return routeName ? route(routeName) : null;
    }

    // Verification Notice
    function verificationNoticeRouteExists(): boolean {
        return resolveRouteName(routes.verificationNotice) !== null;
    }

    function getVerificationNoticeRoute(): string | null {
        const routeName = resolveRouteName(routes.verificationNotice);
        return routeName ? route(routeName) : null;
    }

    // Verification Verify
    function verificationVerifyRouteExists(): boolean {
        return resolveRouteName(routes.verificationVerify) !== null;
    }

    function getVerificationVerifyRoute(params: any): string | null {
        const routeName = resolveRouteName(routes.verificationVerify);
        return routeName ? route(routeName, params) : null;
    }

    // Verification Send
    function verificationSendRouteExists(): boolean {
        return resolveRouteName(routes.verificationSend) !== null;
    }

    function getVerificationSendRoute(): string | null {
        const routeName = resolveRouteName(routes.verificationSend);
        return routeName ? route(routeName) : null;
    }

    // Password Confirm
    function passwordConfirmRouteExists(): boolean {
        return resolveRouteName(routes.passwordConfirm) !== null;
    }

    function getPasswordConfirmRoute(): string | null {
        const routeName = resolveRouteName(routes.passwordConfirm);
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
