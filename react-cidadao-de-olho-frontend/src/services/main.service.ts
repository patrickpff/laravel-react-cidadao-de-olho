import apiService from "./api.service";

const route_deputado_mais_gastaram = '/deputado/mais_gastaram';

const deputadosMaisGastaram = () => {
    return apiService
        .get(route_deputado_mais_gastaram)
        .then((response) => {
            return response.data;
        });
};

const route_deputado_completo = '/deputado/completo';

const deputadosCompleto = () => {
    return apiService
        .get(route_deputado_completo)
        .then((response) => {
            return response.data;
        });
};

const route_partido_mais_gastaram = '/partido/mais_gastaram';

const partidosMaisGastaram = () => {
    return apiService
        .get(route_partido_mais_gastaram)
        .then((response) => {
            return response.data;
        });
}

const route_partido_completo = '/partido/completo';

const partidosCompleto = () => {
    return apiService
        .get(route_partido_completo)
        .then((response) => {
            return response.data;
        });
}

const route_update = '/sincronizar';

const sincronizar = () => {
    return apiService
        .get(route_update)
        .then((response) => {
            return response.data;
        });
}

export default {
    deputadosMaisGastaram,
    deputadosCompleto,
    partidosMaisGastaram,
    partidosCompleto,
    sincronizar
};