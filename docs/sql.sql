SELECT 
td_curso_usuario.curd_id,
tm_curso.cur_id,
tm_curso.cur_nom,
tm_curso.cur_descripcion,
tm_curso.cur_fecinicio,
tm_curso.cur_fecfin,
tm_usuario.usu_id,
tm_usuario.usu_nom,
tm_usuario.usu_apep,
tm_usuario.usu_apem,
tm_instructor.inst_id,
tm_instructor.inst_nomb,
tm_instructor.inst_apep,
tm_instructor.inst_apem
FROM ((`td_curso_usuario` INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id) INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id) INNER JOIN tm_instructor on tm_curso.inst_id = tm_instructor.inst_id
WHERE 
td_curso_usuario.usu_id = 1;