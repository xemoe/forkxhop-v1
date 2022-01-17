############################################################
# Build Docker Images ######################################
############################################################

build_dir=${ROOT_DIR}/build
dockerfile_v1_dir=${ROOT_DIR}/dev/dockers/v1
no_cache=--no-cache

#
# Build v1/base/app
#
v1_base_app_compress_file=${build_dir}/v1/base-app.v1.tar.gz
v1_base_app_dockerfile=${dockerfile_v1_dir}/base/app/Dockerfile
v1_base_app_tag=xemoe/forkxhop-v1/base-app:v1.0

.PHONY: docker-images-v1-base-app
docker-images-v1-base-app:
	@echo "Build from: ${v1_base_app_dockerfile}"
	docker image build --force-rm ${no_cache} --tag="${v1_base_app_tag}" --file="${v1_base_app_dockerfile}" .

${v1_base_app_compress_file}: docker-images-v1-base-app

#
# Build all v1 base images
#
build_v1_base_images: \
    ${v1_base_app_compress_file}
